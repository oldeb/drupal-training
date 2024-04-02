.DEFAULT_GOAL = default

## Aliases
default: help

## Targets
.PHONY: download
download: ## Install Drupal.
	@mkdir -p www
	@cd www && ddev composer create drupal/recommended-project . --no-interaction -d /var/www/html/www
	@cd www && ddev composer require drush/drush drupal/admin_toolbar -d /var/www/html/www

.PHONY: help
help:  ## Display this help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

.PHONY: install
install: ## Install Drupal.
	@ddev drush si --account-name=admin --account-pass=admin -y
	@ddev drush uli
	@ddev launch
