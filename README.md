# JobLeads

Develop a software that can be used to calculate statistics about the tax income of a country. The country is organized in 5 states and theses states are devided into counties.

Each county has a different tax rate and collects a different amount of taxes.

The software should have the following features:

- Output the overall amount of taxes collected per state
- Output the average amount of taxes collected per state
- Output the average county tax rate per state
- Output the average tax rate of the country 
- Output the collected overall taxes of the country

Please use the MVC pattern in your implementation and implement two different datasources of your choice.

This pŕoject uses Symfony 4.3.4.

To configure the database edit the file.env.

To create the database run the commands: php bin/console doctrine:database:create
To create all the database structure: php bin/console doctrine:migrations:migrate

About server configuration see https://symfony.com/doc/current/setup/web_server_configuration.html
