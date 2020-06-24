<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602194111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE excipient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, excipient VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE medicament_excipient (medicament_id INTEGER NOT NULL, excipient_id INTEGER NOT NULL, PRIMARY KEY(medicament_id, excipient_id))');
        $this->addSql('CREATE INDEX IDX_98942078AB0D61F7 ON medicament_excipient (medicament_id)');
        $this->addSql('CREATE INDEX IDX_98942078F4CD02C7 ON medicament_excipient (excipient_id)');
        $this->addSql('DROP TABLE excipient_notoire');
        $this->addSql('DROP TABLE medicament_excipient_notoire');
        $this->addSql('CREATE TEMPORARY TABLE __temp__classe_pharma AS SELECT id, nom_classe_pharma, symptome FROM classe_pharma');
        $this->addSql('DROP TABLE classe_pharma');
        $this->addSql('CREATE TABLE classe_pharma (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, symptome VARCHAR(255) NOT NULL COLLATE BINARY, classe_pharma VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO classe_pharma (id, classe_pharma, symptome) SELECT id, nom_classe_pharma, symptome FROM __temp__classe_pharma');
        $this->addSql('DROP TABLE __temp__classe_pharma');
        $this->addSql('CREATE TEMPORARY TABLE __temp__principe_actif AS SELECT id, nom_pactif FROM principe_actif');
        $this->addSql('DROP TABLE principe_actif');
        $this->addSql('CREATE TABLE principe_actif (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, principe_actif VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO principe_actif (id, principe_actif) SELECT id, nom_pactif FROM __temp__principe_actif');
        $this->addSql('DROP TABLE __temp__principe_actif');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medicament AS SELECT id, nom_medic, posologie_recommandee, posologie_max FROM medicament');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('CREATE TABLE medicament (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_medic VARCHAR(255) NOT NULL COLLATE BINARY, posologie_recommandee VARCHAR(255) NOT NULL COLLATE BINARY, posologie_max VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO medicament (id, nom_medic, posologie_recommandee, posologie_max) SELECT id, nom_medic, posologie_recommandee, posologie_max FROM __temp__medicament');
        $this->addSql('DROP TABLE __temp__medicament');
        $this->addSql('DROP INDEX IDX_5B9446DBAB0D61F7');
        $this->addSql('DROP INDEX IDX_5B9446DB34E3F871');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medicament_classe_pharma AS SELECT medicament_id, classe_pharma_id FROM medicament_classe_pharma');
        $this->addSql('DROP TABLE medicament_classe_pharma');
        $this->addSql('CREATE TABLE medicament_classe_pharma (medicament_id INTEGER NOT NULL, classe_pharma_id INTEGER NOT NULL, PRIMARY KEY(medicament_id, classe_pharma_id), CONSTRAINT FK_5B9446DBAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5B9446DB34E3F871 FOREIGN KEY (classe_pharma_id) REFERENCES classe_pharma (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO medicament_classe_pharma (medicament_id, classe_pharma_id) SELECT medicament_id, classe_pharma_id FROM __temp__medicament_classe_pharma');
        $this->addSql('DROP TABLE __temp__medicament_classe_pharma');
        $this->addSql('CREATE INDEX IDX_5B9446DBAB0D61F7 ON medicament_classe_pharma (medicament_id)');
        $this->addSql('CREATE INDEX IDX_5B9446DB34E3F871 ON medicament_classe_pharma (classe_pharma_id)');
        $this->addSql('DROP INDEX IDX_AE0B5C62AB0D61F7');
        $this->addSql('DROP INDEX IDX_AE0B5C62C191CAB3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medicament_principe_actif AS SELECT medicament_id, principe_actif_id FROM medicament_principe_actif');
        $this->addSql('DROP TABLE medicament_principe_actif');
        $this->addSql('CREATE TABLE medicament_principe_actif (medicament_id INTEGER NOT NULL, principe_actif_id INTEGER NOT NULL, PRIMARY KEY(medicament_id, principe_actif_id), CONSTRAINT FK_AE0B5C62AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_AE0B5C62C191CAB3 FOREIGN KEY (principe_actif_id) REFERENCES principe_actif (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO medicament_principe_actif (medicament_id, principe_actif_id) SELECT medicament_id, principe_actif_id FROM __temp__medicament_principe_actif');
        $this->addSql('DROP TABLE __temp__medicament_principe_actif');
        $this->addSql('CREATE INDEX IDX_AE0B5C62AB0D61F7 ON medicament_principe_actif (medicament_id)');
        $this->addSql('CREATE INDEX IDX_AE0B5C62C191CAB3 ON medicament_principe_actif (principe_actif_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE excipient_notoire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_excip VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE TABLE medicament_excipient_notoire (medicament_id INTEGER NOT NULL, excipient_notoire_id INTEGER NOT NULL, PRIMARY KEY(medicament_id, excipient_notoire_id))');
        $this->addSql('CREATE INDEX IDX_1446E05FAB0D61F7 ON medicament_excipient_notoire (medicament_id)');
        $this->addSql('CREATE INDEX IDX_1446E05F9E60AB75 ON medicament_excipient_notoire (excipient_notoire_id)');
        $this->addSql('DROP TABLE excipient');
        $this->addSql('DROP TABLE medicament_excipient');
        $this->addSql('CREATE TEMPORARY TABLE __temp__classe_pharma AS SELECT id, classe_pharma, symptome FROM classe_pharma');
        $this->addSql('DROP TABLE classe_pharma');
        $this->addSql('CREATE TABLE classe_pharma (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, symptome VARCHAR(255) NOT NULL, nom_classe_pharma VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO classe_pharma (id, nom_classe_pharma, symptome) SELECT id, classe_pharma, symptome FROM __temp__classe_pharma');
        $this->addSql('DROP TABLE __temp__classe_pharma');
        $this->addSql('ALTER TABLE medicament ADD COLUMN image VARCHAR(255) NOT NULL COLLATE BINARY');
        $this->addSql('DROP INDEX IDX_5B9446DBAB0D61F7');
        $this->addSql('DROP INDEX IDX_5B9446DB34E3F871');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medicament_classe_pharma AS SELECT medicament_id, classe_pharma_id FROM medicament_classe_pharma');
        $this->addSql('DROP TABLE medicament_classe_pharma');
        $this->addSql('CREATE TABLE medicament_classe_pharma (medicament_id INTEGER NOT NULL, classe_pharma_id INTEGER NOT NULL, PRIMARY KEY(medicament_id, classe_pharma_id))');
        $this->addSql('INSERT INTO medicament_classe_pharma (medicament_id, classe_pharma_id) SELECT medicament_id, classe_pharma_id FROM __temp__medicament_classe_pharma');
        $this->addSql('DROP TABLE __temp__medicament_classe_pharma');
        $this->addSql('CREATE INDEX IDX_5B9446DBAB0D61F7 ON medicament_classe_pharma (medicament_id)');
        $this->addSql('CREATE INDEX IDX_5B9446DB34E3F871 ON medicament_classe_pharma (classe_pharma_id)');
        $this->addSql('DROP INDEX IDX_AE0B5C62AB0D61F7');
        $this->addSql('DROP INDEX IDX_AE0B5C62C191CAB3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medicament_principe_actif AS SELECT medicament_id, principe_actif_id FROM medicament_principe_actif');
        $this->addSql('DROP TABLE medicament_principe_actif');
        $this->addSql('CREATE TABLE medicament_principe_actif (medicament_id INTEGER NOT NULL, principe_actif_id INTEGER NOT NULL, PRIMARY KEY(medicament_id, principe_actif_id))');
        $this->addSql('INSERT INTO medicament_principe_actif (medicament_id, principe_actif_id) SELECT medicament_id, principe_actif_id FROM __temp__medicament_principe_actif');
        $this->addSql('DROP TABLE __temp__medicament_principe_actif');
        $this->addSql('CREATE INDEX IDX_AE0B5C62AB0D61F7 ON medicament_principe_actif (medicament_id)');
        $this->addSql('CREATE INDEX IDX_AE0B5C62C191CAB3 ON medicament_principe_actif (principe_actif_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__principe_actif AS SELECT id, principe_actif FROM principe_actif');
        $this->addSql('DROP TABLE principe_actif');
        $this->addSql('CREATE TABLE principe_actif (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_pactif VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO principe_actif (id, nom_pactif) SELECT id, principe_actif FROM __temp__principe_actif');
        $this->addSql('DROP TABLE __temp__principe_actif');
    }
}
