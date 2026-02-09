# Open Source School
## Drupal Training

This project skeleton uses [DDEV](https://ddev.readthedocs.io/) as a Docker wrapper.
Please install it before usage.

### Startup your environment
`ddev start`

### Download Drupal
`ddev download`

### Install Drupal
`ddev install` or `ddev drush si --account-pass=admin -y`

### Access installed app
`ddev launch` or https://drupal-training.ddev.site/

#### Access administration
URL: https://drupal-training.ddev.site/user/login

Username: *admin*

Password: *admin*

### Other usefull commands
* Execute a Drush command : `ddev drush <your-command>`
* [All Drush commands](https://www.drush.org/12.0.1/commands/all/)

More [DDEV commands](https://ddev.readthedocs.io/en/stable/users/usage/cli/)
