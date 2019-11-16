<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191116124456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commander ADD created_by_id INT DEFAULT NULL, ADD edited_by_id INT DEFAULT NULL, ADD quantiteenstock INT NOT NULL, ADD etat SMALLINT NOT NULL, ADD slug VARCHAR(255) NOT NULL, ADD created_on DATETIME NOT NULL, ADD edited_on DATETIME DEFAULT NULL, DROP codebarecaton, DROP codebareproduit, CHANGE capacite quantitecommandee INT NOT NULL, CHANGE reference sousreference VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BAB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BADD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42D318BAB03A8386 ON commander (created_by_id)');
        $this->addSql('CREATE INDEX IDX_42D318BADD7B2EBC ON commander (edited_by_id)');
        $this->addSql('ALTER TABLE produit ADD stockalerte INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commander DROP FOREIGN KEY FK_42D318BAB03A8386');
        $this->addSql('ALTER TABLE commander DROP FOREIGN KEY FK_42D318BADD7B2EBC');
        $this->addSql('DROP INDEX IDX_42D318BAB03A8386 ON commander');
        $this->addSql('DROP INDEX IDX_42D318BADD7B2EBC ON commander');
        $this->addSql('ALTER TABLE commander ADD codebarecaton LONGBLOB NOT NULL, ADD codebareproduit LONGBLOB NOT NULL, ADD capacite INT NOT NULL, ADD reference VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP created_by_id, DROP edited_by_id, DROP quantitecommandee, DROP quantiteenstock, DROP etat, DROP sousreference, DROP slug, DROP created_on, DROP edited_on');
        $this->addSql('ALTER TABLE produit DROP stockalerte');
    }
}
