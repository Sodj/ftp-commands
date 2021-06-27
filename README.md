## Ftp Commands
Run commands without SSH, just FTP access and a browser.

If you need to run a command on a server where you don't have SSH access just FTP, this is an easy solution:

- Upload the file (ssh.php) ⬆️
- Set your password (in the file) 🔒
- Done ✅

Now you can login using your password and run commands like `composer`, `php artisan`, `zip / unzip`, `wget` and more, directly from the browser.

ℹ️  **Notice:** 

Not all commands can be ran, and the permission scope is that of the FTP user.

⚠️  **Warning:** 

The login protection is weak, consider deleting the file once done.
