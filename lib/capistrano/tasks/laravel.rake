namespace :laravel do
    desc "Accorder les permissions"
    task :fix_permissions do
        on roles (:web) do
            within release_path do
                execute :chmod, "777", "-R", "storage/"
            end
        end
    end
end
