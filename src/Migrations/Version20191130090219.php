<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191130090219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE modereglement (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_C643F0B7DD7B2EBC (edited_by_id), INDEX IDX_C643F0B7B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modereglement ADD CONSTRAINT FK_C643F0B7DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE modereglement ADD CONSTRAINT FK_C643F0B7B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD modereglement_id INT NOT NULL, ADD payer SMALLINT DEFAULT NULL, ADD grosdetail VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D25D39DCF4 FOREIGN KEY (modereglement_id) REFERENCES modereglement (id)');
        $this->addSql('CREATE INDEX IDX_356D39D25D39DCF4 ON venteshowroom (modereglement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE venteshowroom DROP FOREIGN KEY FK_356D39D25D39DCF4');
        $this->addSql('DROP TABLE modereglement');
        $this->addSql('DROP INDEX IDX_356D39D25D39DCF4 ON venteshowroom');
        $this->addSql('ALTER TABLE venteshowroom DROP modereglement_id, DROP payer, DROP grosdetail');
    }
}
