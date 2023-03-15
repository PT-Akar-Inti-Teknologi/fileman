Change Log
14-03-2023
- app/Console/Commands/SyncBranchList.php
- app/Console/Commands/SyncDeviationList.php
- app/Console/Commands/SyncSandiDati.php
- app/Http/Controllers/ActivityApprovalController.php

Change Log
20-12-2019
- app/Http/Controllers/ApplicationController.php
- app/Http/Controllers/RoleController.php

# simpler fileman
File Manager for Simpler

1. Run composer install

2. Copy .env.development to .env

3. Edit the setting in .env file make sure same as simpler config file except for 'APP_URL' param

4. Run "php artisan migrate" if there are some new migration file, please rerun this command.
