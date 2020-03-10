<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200310075749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat ADD oferta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471FAFBF624 FOREIGN KEY (oferta_id) REFERENCES oferta (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B471FAFBF624 ON candidat (oferta_id)');
        $this->addSql('ALTER TABLE oferta ADD oferta_empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F2FF8893F5 FOREIGN KEY (oferta_empresa_id) REFERENCES empresa (id)');
        $this->addSql('CREATE INDEX IDX_7479C8F2FF8893F5 ON oferta (oferta_empresa_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471FAFBF624');
        $this->addSql('DROP INDEX IDX_6AB5B471FAFBF624 ON candidat');
        $this->addSql('ALTER TABLE candidat DROP oferta_id');
        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F2FF8893F5');
        $this->addSql('DROP INDEX IDX_7479C8F2FF8893F5 ON oferta');
        $this->addSql('ALTER TABLE oferta DROP oferta_empresa_id');
    }
}
