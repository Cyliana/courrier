<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109105059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE courrier (id INT AUTO_INCREMENT NOT NULL, destinataire_id INT NOT NULL, utilisateur_id INT NOT NULL, ref_annonce VARCHAR(255) DEFAULT NULL, objet VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, date_envoi DATETIME NOT NULL, date_relance DATETIME DEFAULT NULL, nos_ref VARCHAR(255) DEFAULT NULL, vos_ref VARCHAR(255) DEFAULT NULL, paragraphe_je LONGTEXT NOT NULL, paragraphe_vous LONGTEXT NOT NULL, paragraphe_nous LONGTEXT NOT NULL, paragraphe_politesse LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, copie_annonce LONGTEXT DEFAULT NULL, INDEX IDX_BEF47CAAA4F84F6E (destinataire_id), INDEX IDX_BEF47CAAFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destinataire (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, fonction VARCHAR(255) DEFAULT NULL, denomination VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_FEA9FF92FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi (id INT AUTO_INCREMENT NOT NULL, precedent_id INT DEFAULT NULL, suivant_id INT DEFAULT NULL, courrier_id INT NOT NULL, date DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_2EBCCA8F4F6564F9 (precedent_id), INDEX IDX_2EBCCA8F9C2BB0CC (suivant_id), INDEX IDX_2EBCCA8F8BF41DC7 (courrier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(180) NOT NULL, roles JSON NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649C90409EC (identifiant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE courrier ADD CONSTRAINT FK_BEF47CAAA4F84F6E FOREIGN KEY (destinataire_id) REFERENCES destinataire (id)');
        $this->addSql('ALTER TABLE courrier ADD CONSTRAINT FK_BEF47CAAFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF92FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8F4F6564F9 FOREIGN KEY (precedent_id) REFERENCES courrier (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8F9C2BB0CC FOREIGN KEY (suivant_id) REFERENCES courrier (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8F8BF41DC7 FOREIGN KEY (courrier_id) REFERENCES courrier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8F4F6564F9');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8F9C2BB0CC');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8F8BF41DC7');
        $this->addSql('ALTER TABLE courrier DROP FOREIGN KEY FK_BEF47CAAA4F84F6E');
        $this->addSql('ALTER TABLE courrier DROP FOREIGN KEY FK_BEF47CAAFB88E14F');
        $this->addSql('ALTER TABLE destinataire DROP FOREIGN KEY FK_FEA9FF92FB88E14F');
        $this->addSql('DROP TABLE courrier');
        $this->addSql('DROP TABLE destinataire');
        $this->addSql('DROP TABLE suivi');
        $this->addSql('DROP TABLE `user`');
    }
}
