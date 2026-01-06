<?php
/**
 * @file
 * Tugboat preview environment settings.
 *
 * To activate these settings for sites in Tugboat preview environments,
 * ensure that this file is placed in ./tugboat/settings.local.php
 * in the root of your git repository.
 * 
 * Based on Drupal 10 tutorial, adapted for Drupal 11.
 * 
 * @see https://docs.tugboatqa.com/starter-configs/tutorials/drupal-10/
 * @todo Update link once Drupal 11 tutorial is published
 *
 */

/**
 * Database connection information for Tugboat preview environments.
 */
$databases['default']['default'] = array (
  'database' => 'tugboat',
  'username' => 'tugboat',
  'password' => 'tugboat',
  'prefix' => '',
  'host' => 'database',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

/**
 * Salt for one-time login links, cancel links, form tokens, etc.
 *
 * Use the TUGBOAT_REPO_ID to generate a hash salt for Tugboat sites.
 *
 */
$settings['hash_salt'] = hash('sha256', getenv('TUGBOAT_REPO_ID'));

/**
 * Location of config sync directory in Tugboat preview environment.
 * 
 * If your Drupal config sync directory is outside of the Drupal web root,
 * uncomment and adapt the following setting.
 * 
 * Note: the TUGBOAT_ROOT environment variable is equivalent to the git repo 
 * root.
 */
$settings['config_sync_directory'] = getenv('TUGBOAT_ROOT') . '/config';

/**
 * Location of private file path in Tugboat preview environment.
 *
 * If you are using private files, and that directory is outside of the Drupal
 * web root, uncomment and adapt the following.
 * 
 * Note: the TUGBOAT_ROOT environment variable is equivalent to the git repo 
 * root.
 */
# $settings['file_private_path'] = getenv('TUGBOAT_ROOT') . '/files-private';

/**
 * Skip file system permissions hardening.
 *
 * The system module will periodically check the permissions of your site's
 * site directory to ensure that it is not writable by the website user. For
 * sites that are managed with a version control system, this can cause problems
 * when files in that directory such as settings.php are updated, because the
 * user pulling in the changes won't have permissions to modify files in the
 * directory.
 */
$settings['skip_permissions_hardening'] = TRUE;

/**
 * Trusted host configuration for Tugboat preview environments.
 *
 * @see https://www.drupal.org/docs/installing-drupal/trusted-host-settings
 */
$settings['trusted_host_patterns'] = [
  '\.tugboatqa\.com$',
];
