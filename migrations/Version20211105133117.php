<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211105133117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi DROP INDEX UNIQ_2EBCCA8F4F6564F9, ADD INDEX IDX_2EBCCA8F4F6564F9 (precedent_id)');
        $this->addSql('ALTER TABLE suivi DROP INDEX UNIQ_2EBCCA8F9C2BB0CC, ADD INDEX IDX_2EBCCA8F9C2BB0CC (suivant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi DROP INDEX IDX_2EBCCA8F4F6564F9, ADD UNIQUE INDEX UNIQ_2EBCCA8F4F6564F9 (precedent_id)');
        $this->addSql('ALTER TABLE suivi DROP INDEX IDX_2EBCCA8F9C2BB0CC, ADD UNIQUE INDEX UNIQ_2EBCCA8F9C2BB0CC (suivant_id)');
    }
}
