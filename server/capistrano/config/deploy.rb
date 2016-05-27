# -*- coding: utf-8 -*-
require 'capistrano/ext/multistage'
require 'capistrano_colors'
require 'railsless-deploy'
require 'rubygems'
require 'capistrano-slack-notify'

set :application, 'pms'
set :scm, :git
set :repository, 'ssh://git@gitlab.fusic.co.jp:10022/nishitetsu/pms.git'
set :branch, 'master'
set :slack_webhook_url, 'https://hooks.slack.com/services/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'
# set :slack_room, '#pms'
# set :slack_username, 'Capistrano'

# before 'deploy', 'slack:starting'
before 'deploy', 'deploy:setup_shared'
before 'deploy:create_symlink', 'deploy:link_tmp'
before 'deploy:create_symlink', 'upload_app_local'
before 'deploy:create_symlink', 'deploy:composer_install'
before 'deploy:create_symlink', 'deploy:change_permission'
before 'deploy:create_symlink', 'deploy:clear_cache'
before 'deploy:create_symlink', 'migrate'
after 'deploy', 'httpd_restart'
after 'deploy', 'deploy:clear_cache'
after 'deploy', 'cleanup_releases'
after 'deploy', 'slack:finished'
after 'deploy:rollback', 'deploy:clear_cache'

namespace(:deploy) do
  desc 'Create shared directries'
  task :setup_shared, roles => :web do
    run <<-CMD
    if [ ! -d #{shared_path}/tmp/cache ]; then mkdir -p #{shared_path}/tmp/cache; fi
  CMD
    run <<-CMD
    if [ ! -d #{shared_path}/tmp/cache/models ]; then mkdir -p #{shared_path}/tmp/cache/models; fi
  CMD
    run <<-CMD
    if [ ! -d #{shared_path}/tmp/cache/views ]; then mkdir -p #{shared_path}/tmp/cache/views; fi
  CMD
    run <<-CMD
    if [ ! -d #{shared_path}/tmp/cache/persistent ]; then mkdir -p #{shared_path}/tmp/cache/persistent; fi
  CMD
    run <<-CMD
    if [ ! -d #{shared_path}/tmp/logs ]; then mkdir -p #{shared_path}/tmp/logs; fi
  CMD
    run <<-CMD
    if [ ! -d #{shared_path}/tmp/sessions ]; then mkdir -p #{shared_path}/tmp/sessions; fi
  CMD
  end

  desc 'Create a symbolic link of tmp'
  task :link_tmp, roles => :web do
    run <<-CMD
    rm -rf #{release_path}/tmp &&
    cd #{release_path} &&
    ln -nfs #{shared_path}/tmp #{release_path}
  CMD
  end

  desc 'Change permission'
  task :change_permission, roles => :web do
    run <<-CMD
    #{sudo} chmod -R 777 #{release_path}/tmp
  CMD
  end

  desc 'Clear cache'
  task :clear_cache, roles => :web do
    run <<-CMD
    #{sudo} rm -f #{release_path}/tmp/cache/models/* && #{sudo} rm -f #{release_path}/tmp/cache/persistent/*
  CMD
    run <<-CMD
    #{sudo} rm -f #{shared_path}/tmp/cache/models/* && #{sudo} rm -f #{shared_path}/tmp/cache/persistent/*
  CMD
  end

  desc 'Install plugins via Composer'
  task :composer_install, roles => :web do
    run <<-CMD
    cd #{release_path}/ &&
    curl -sS https://getcomposer.org/installer | php
  CMD
    run <<-CMD
    cd #{release_path}/ &&
    php composer.phar install --no-dev --no-interaction
  CMD
  end
end

desc 'データベースのマイグレーションを実行します'
task :migrate, roles => :web do
  upload File.dirname(__FILE__) + "/#{stage}/database.yml", "#{release_path}/config/database.yml", :via => :scp
  # chmod +x #{release_path}/bin/cake && cd #{release_path}/ && #{release_path}/bin/cake migrations migrate
  run <<-CMD
    export PATH="$HOME/.rbenv/bin:$PATH"; eval "$(rbenv init -)"; cd #{release_path}/ && ridgepole -c config/database.yml --apply -f config/Schemafile --enable-migration-comments
  CMD
end

desc 'Upload app_local'
task :upload_app_local, roles => :web do
  upload File.dirname(__FILE__) + "/#{stage}/app_local.php", "#{release_path}/config/app_local.php", :via => :scp
end

desc 'Restart httpd24-httpd'
task :httpd_restart, roles => :web do
  run <<-CMD
    #{sudo} /bin/systemctl restart httpd24-httpd.service
  CMD
end

desc 'Cleanup releases'
task :cleanup_releases, roles => :web do
  run <<-CMD
    ls -1dt #{deploy_to}/releases/* | tail -n +4 | xargs #{sudo} rm -rf
  CMD
end
