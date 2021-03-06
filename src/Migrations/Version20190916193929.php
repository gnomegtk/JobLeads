<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190916193929 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE county (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, tax_rate DOUBLE PRECISION NOT NULL, amount_taxes SMALLINT NOT NULL, UNIQUE INDEX UNIQ_58E2FF255E237E06 (name), INDEX IDX_58E2FF255D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A393D2FB5E237E06 (name), INDEX IDX_A393D2FBF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5373C9665E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE county ADD CONSTRAINT FK_58E2FF255D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE state ADD CONSTRAINT FK_A393D2FBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE county DROP FOREIGN KEY FK_58E2FF255D83CC1');
        $this->addSql('ALTER TABLE state DROP FOREIGN KEY FK_A393D2FBF92F3E70');
        $this->addSql('DROP TABLE county');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE country');
    }
}
