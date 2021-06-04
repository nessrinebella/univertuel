<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603115514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD55D20926C');
        $this->addSql('DROP INDEX IDX_A0ECCD55D20926C ON prophecy_sheet');
        $this->addSql('ALTER TABLE prophecy_sheet DROP caracteristics_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_sheet ADD caracteristics_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD55D20926C FOREIGN KEY (caracteristics_id) REFERENCES prophecy_sheet_caracteristics (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A0ECCD55D20926C ON prophecy_sheet (caracteristics_id)');
    }
}
