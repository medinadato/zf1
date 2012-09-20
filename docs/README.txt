README
======

This directory should be used to place project specfic documentation including
but not limited to project notes, generated API/phpdoc documentation, or
manual files generated or hand written.  Ideally, this directory would remain
in your development environment only and should not be deployed with your
application to it's final production location.


Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
   DocumentRoot "/var/www/zf/public"
   ServerName local.zf

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development

   <Directory "/var/www/zf/public">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>

</VirtualHost>


Setting Up Your Database
=====================

Run the file blog.mwb in docs/eer and then grant access to a user zend on blog db.
e.g. GRANT ALL ON blog.* TO 'zend'@'localhost' IDENTIFIED BY 'zend';

Setting Up Your Git client
=====================

Run the line below to don't send files that you've changed the the file mode

git config core.filemode false

git remote set-url origin git@github.com:medinadato/zf1.git