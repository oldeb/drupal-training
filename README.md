# Open Source School
## Drupal Training

This project skeleton uses the following Docker wrappers :

- [Lando](https://lando.dev/)
- [DDEV](https://ddev.readthedocs.io/)

please install one of them before usage.

### Startup your environment
`lando start` or `ddev start`

### Download Drupal
`lando download` or `ddev composer create drupal/recommended-project && ddev require drush/drush`

### Install Drupal
`lando install` or `ddev drush si --account-pass=admin -y`

### Other usefull commands
* Execute a Drush command : `lando drush <your-command>` or `ddev drush <your-command>`

More at [Lando commands](https://docs.lando.dev/basics/usage.html#default-commands) and [DDEV commands](https://ddev.readthedocs.io/en/stable/users/usage/cli/)
