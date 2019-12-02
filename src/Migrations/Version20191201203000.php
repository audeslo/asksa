<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191201203000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandeshow CHANGE statut statut SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE modereglement CHANGE edited_on edited_on DATETIME NOT NULL, CHANGE created_on created_on DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD created_by_id INT DEFAULT NULL, ADD edited_by_id INT DEFAULT NULL, ADD sexe VARCHAR(1) DEFAULT NULL, ADD username VARCHAR(255) NOT NULL, ADD username_canonical VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) NOT NULL, ADD email_canonical VARCHAR(255) DEFAULT NULL, ADD enabled TINYINT(1) DEFAULT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) NOT NULL, ADD plain_password VARCHAR(255) DEFAULT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(255) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD groups LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD created_on DATETIME NOT NULL, ADD edited_on DATETIME DEFAULT NULL, DROP mail, DROP mdp, DROP mdpconfirm, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649B03A8386 ON user (created_by_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649DD7B2EBC ON user (edited_by_id)');
        $this->addSql('ALTER TABLE venteshowroom CHANGE edited_on edited_on DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandeshow CHANGE statut statut SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE modereglement CHANGE edited_on edited_on DATETIME DEFAULT NULL, CHANGE created_on created_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B03A8386');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DD7B2EBC');
        $this->addSql('DROP INDEX IDX_8D93D649B03A8386 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649DD7B2EBC ON user');
        $this->addSql('ALTER TABLE user ADD mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mdp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mdpconfirm VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP created_by_id, DROP edited_by_id, DROP sexe, DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP plain_password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP groups, DROP roles, DROP created_on, DROP edited_on, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE venteshowroom CHANGE edited_on edited_on DATETIME NOT NULL');
    }
}
