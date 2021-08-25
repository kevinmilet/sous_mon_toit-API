# config valid for current version and patch releases of Capistrano
lock "~> 3.16.0"

set :application, "sous_mon_toit-API"
set :repo_url, "git@github.com:kevinmilet/sous_mon_toit-API.git"

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, "/var/www/api-sousmontoit.am.manusien-ecolelamanu.fr/web"

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: "log/capistrano.log", color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
append :linked_files, ".env"

# Default value for linked_dirs is []
append :linked_dirs, "public/uploads"

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for local_user is ENV['USER']
# set :local_user, -> { `git config user.name`.chomp }

# Default value for keep_releases is 5
set :keep_releases, 3

# Uncomment the following to require manually verifying the host key before first deploy.
# set :ssh_options, verify_host_key: :secure

# set :github_access_token, "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"

namespace :deploy do
	after :updated, "composer:install"
	after :updated, "laravel:fix_permissions"
	after :updated, "migration:make_migration"
end

# before 'deploy:starting', 'github:deployment:create'
# after  'deploy:starting', 'github:deployment:pending'
# after  'deploy:finished', 'github:deployment:success'
# after  'deploy:failed',   'github:deployment:failure'
