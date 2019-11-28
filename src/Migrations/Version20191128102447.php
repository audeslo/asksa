<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191128102447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stockshowroom (id INT AUTO_INCREMENT NOT NULL, commandershow_id INT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, referencecarton VARCHAR(255) NOT NULL, referencebidon VARCHAR(255) NOT NULL, ouvert TINYINT(1) NOT NULL, vendu TINYINT(1) NOT NULL, prixdevente INT NOT NULL, slug VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, edited_on DATETIME DEFAULT NULL, INDEX IDX_73C1B5914409F943 (commandershow_id), INDEX IDX_73C1B591B03A8386 (created_by_id), INDEX IDX_73C1B591DD7B2EBC (edited_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B5914409F943 FOREIGN KEY (commandershow_id) REFERENCES commandershow (id)');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B591B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B591DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD etat SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE commandershow CHANGE created_on created_on DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stockshowroom');
        $this->addSql('ALTER TABLE commande DROP etat');
        $this->addSql('ALTER TABLE commandershow CHANGE created_on created_on DATETIME DEFAULT NULL');
    }
}
