<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191118221621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE showroom (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, nomshow VARCHAR(255) NOT NULL, quartier VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, representant VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, created_on DATETIME NOT NULL, INDEX IDX_1E2F444FDD7B2EBC (edited_by_id), INDEX IDX_1E2F444FB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE showroom ADD CONSTRAINT FK_1E2F444FDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE showroom ADD CONSTRAINT FK_1E2F444FB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE showroom');
    }
}
