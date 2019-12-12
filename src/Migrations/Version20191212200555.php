<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212200555 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categorie CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE prixventeconseiller prixventeconseiller INT NOT NULL');
        $this->addSql('ALTER TABLE showroom CHANGE mail mail VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD created_by_id INT DEFAULT NULL, ADD edited_by_id INT DEFAULT NULL, ADD created_on DATETIME NOT NULL, ADD edited_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC357B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC357DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E1ACC357B03A8386 ON tarifcategorieclt (created_by_id)');
        $this->addSql('CREATE INDEX IDX_E1ACC357DD7B2EBC ON tarifcategorieclt (edited_by_id)');
        $this->addSql('ALTER TABLE user ADD showroom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492243B88B FOREIGN KEY (showroom_id) REFERENCES showroom (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492243B88B ON user (showroom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categorie CHANGE description description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit CHANGE prixventeconseiller prixventeconseiller VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE showroom CHANGE mail mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tarifcategorieclt DROP FOREIGN KEY FK_E1ACC357B03A8386');
        $this->addSql('ALTER TABLE tarifcategorieclt DROP FOREIGN KEY FK_E1ACC357DD7B2EBC');
        $this->addSql('DROP INDEX IDX_E1ACC357B03A8386 ON tarifcategorieclt');
        $this->addSql('DROP INDEX IDX_E1ACC357DD7B2EBC ON tarifcategorieclt');
        $this->addSql('ALTER TABLE tarifcategorieclt DROP created_by_id, DROP edited_by_id, DROP created_on, DROP edited_on');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492243B88B');
        $this->addSql('DROP INDEX IDX_8D93D6492243B88B ON user');
        $this->addSql('ALTER TABLE user DROP showroom_id');
    }
}
