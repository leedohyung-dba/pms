# -*- coding: utf-8 -*-
# production
role :web, *%w[qherp.staging]

set :use_sudo, false
default_run_options[:pty] = true
set :user, 'fusic'
set :ssh_options, {
  :keys_only => true,
  :auth_methods => %w(publickey),
  :keys => [File.join(ENV['HOME'], '.ssh', 'qherp_staging_fusic_rsa')]
}

set :deploy_to, '/opt/rh/httpd24/root/var/www/html/test'
set :deploy_via, :copy
