namespace :composer do
    desc "Installer les dépendances"
    task :install do
        on roles (:web) do
            within release_path do
                execute :composer, "install"
                execute :composer, "dump-autoload -o"
            end
        end
    end
end
