<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601192345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, content LONGTEXT DEFAULT NULL, is_published TINYINT(1) NOT NULL, INDEX IDX_23A0E66F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_article_tag (article_id INT NOT NULL, article_tag_id INT NOT NULL, INDEX IDX_B15FE9E7294869C (article_id), INDEX IDX_B15FE9ED015F491 (article_tag_id), PRIMARY KEY(article_id, article_tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_tag (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campaign (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, game_id INT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, is_open TINYINT(1) NOT NULL, INDEX IDX_1F1512DD7E3C61F9 (owner_id), INDEX IDX_1F1512DDE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caste (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, faces INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_232B318C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, thread_id INT NOT NULL, is_sender_readed TINYINT(1) NOT NULL, is_receiver_readed TINYINT(1) NOT NULL, number INT NOT NULL, date DATETIME NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FCD53EDB6 (receiver_id), INDEX IDX_B6BD307FE2904019 (thread_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, date_creation DATETIME NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, is_on_top TINYINT(1) NOT NULL, INDEX IDX_1DD39950F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_news_tag (news_id INT NOT NULL, news_tag_id INT NOT NULL, INDEX IDX_F7007BF0B5A459A0 (news_id), INDEX IDX_F7007BF0367BA065 (news_tag_id), PRIMARY KEY(news_id, news_tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_tag (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_advantage (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, category INT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_age (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, min_val INT NOT NULL, max_val INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_armor (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, protection INT NOT NULL, strength_constraint INT NOT NULL, resist_constraint INT NOT NULL, boundary INT NOT NULL, INDEX IDX_3215A3CB12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_armor_category (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_attribute (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, upgrade_cost INT NOT NULL, max_val INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_caracteristic (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, max_val INT NOT NULL, upgrade_cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_combat_weapon (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, melee_initiative INT NOT NULL, combat_initiative INT NOT NULL, strength_constraint INT NOT NULL, coordination_constraint INT NOT NULL, perception_constraint INT NOT NULL, flat_dommages INT NOT NULL, strenght_dommages INT NOT NULL, multiple INT NOT NULL, special_capacities LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_B79991912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_currency (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_disadvantage (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, category INT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_discipline (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, max_val INT NOT NULL, upgrade_cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_hast_weapon (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, melee_initiative INT NOT NULL, combat_initiative INT NOT NULL, strength_constraint INT NOT NULL, coordination_constraint INT NOT NULL, perception_constraint INT NOT NULL, flat_dommages INT DEFAULT NULL, strength_dommages INT NOT NULL, multiple INT NOT NULL, special_capacities INT NOT NULL, INDEX IDX_39DED22812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_magic_domain (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, upgrade_cost INT NOT NULL, max_val INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_magic_mana (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, max_val INT NOT NULL, upgrade_cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_omen (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_range_weapon (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, melee_initiative INT NOT NULL, combat_initiative INT NOT NULL, strength_constraint INT NOT NULL, coordination_constraint INT NOT NULL, perception_constraint INT NOT NULL, flat_dommages INT NOT NULL, strength_dommages INT NOT NULL, multiple INT NOT NULL, special_capacities LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', weapon_range INT NOT NULL, max_range INT NOT NULL, INDEX IDX_59B37C6312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet (id INT AUTO_INCREMENT NOT NULL, age_id INT DEFAULT NULL, items_id INT DEFAULT NULL, campaign_id INT DEFAULT NULL, country_id INT DEFAULT NULL, omen_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, purse_id INT DEFAULT NULL, magic_domain_id INT DEFAULT NULL, disciplines_id INT DEFAULT NULL, tendencies_id INT DEFAULT NULL, wounds_id INT DEFAULT NULL, statistics_id INT DEFAULT NULL, attributes_id INT DEFAULT NULL, caracteristics_id INT DEFAULT NULL, skills_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, initiative INT DEFAULT NULL, chance INT DEFAULT NULL, mastery INT DEFAULT NULL, famous INT DEFAULT NULL, spells LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', background LONGTEXT DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, INDEX IDX_A0ECCD5CC80CD12 (age_id), INDEX IDX_A0ECCD56BB0AE84 (items_id), INDEX IDX_A0ECCD5F639F774 (campaign_id), INDEX IDX_A0ECCD5F92F3E70 (country_id), INDEX IDX_A0ECCD547D39BD9 (omen_id), INDEX IDX_A0ECCD57E3C61F9 (owner_id), INDEX IDX_A0ECCD51A429CB3 (purse_id), INDEX IDX_A0ECCD5C835E77F (magic_domain_id), INDEX IDX_A0ECCD590D3DF94 (disciplines_id), INDEX IDX_A0ECCD5E80EC759 (tendencies_id), INDEX IDX_A0ECCD57B965BDE (wounds_id), INDEX IDX_A0ECCD59A2595B2 (statistics_id), INDEX IDX_A0ECCD5BAAF4009 (attributes_id), INDEX IDX_A0ECCD55D20926C (caracteristics_id), INDEX IDX_A0ECCD57FF61858 (skills_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_advantages (id INT AUTO_INCREMENT NOT NULL, sheet INT NOT NULL, advantages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_attributes (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, attribute_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_175903848B1206A5 (sheet_id), INDEX IDX_17590384B6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_caracteristics (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, caracteristic_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_BD2A45638B1206A5 (sheet_id), INDEX IDX_BD2A456381194CF4 (caracteristic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_disadvantages (id INT AUTO_INCREMENT NOT NULL, sheet INT NOT NULL, disadvantages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_discipline (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_537C73CB8B1206A5 (sheet_id), INDEX IDX_537C73CBA5522701 (discipline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_magic_domain (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, magic_domain_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_FC75A6AB8B1206A5 (sheet_id), INDEX IDX_FC75A6ABC835E77F (magic_domain_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_purse (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, currency_id INT DEFAULT NULL, value INT DEFAULT NULL, INDEX IDX_4C8D29F8B1206A5 (sheet_id), INDEX IDX_4C8D29F38248176 (currency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_skills (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, skill_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_635E5DDB8B1206A5 (sheet_id), INDEX IDX_635E5DDB5585C142 (skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_statistic (id INT AUTO_INCREMENT NOT NULL, statistic_id INT DEFAULT NULL, sheet_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_7F361EAC53B6268F (statistic_id), INDEX IDX_7F361EAC8B1206A5 (sheet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_tendency (id INT AUTO_INCREMENT NOT NULL, sheet_id INT DEFAULT NULL, tendency_id INT DEFAULT NULL, value INT NOT NULL, circles INT NOT NULL, INDEX IDX_4FBFC7548B1206A5 (sheet_id), INDEX IDX_4FBFC7546867581F (tendency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_sheet_wounds (id INT AUTO_INCREMENT NOT NULL, wounds_id INT DEFAULT NULL, sheet_id INT DEFAULT NULL, max_val INT NOT NULL, current_value INT NOT NULL, INDEX IDX_DCDD0F4C7B965BDE (wounds_id), INDEX IDX_DCDD0F4C8B1206A5 (sheet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_skill (id INT AUTO_INCREMENT NOT NULL, attribute_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, upgrade_cost INT NOT NULL, max_val INT NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_D30FB940B6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_spell (id INT AUTO_INCREMENT NOT NULL, magic_domain_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, mana_cost INT NOT NULL, difficulty INT NOT NULL, time LONGTEXT NOT NULL, spell_keys VARCHAR(255) NOT NULL, effect LONGTEXT NOT NULL, INDEX IDX_5D0D90BAC835E77F (magic_domain_id), INDEX IDX_5D0D90BAA5522701 (discipline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_statistic (id INT AUTO_INCREMENT NOT NULL, statistic_category_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_137A908B2317909B (statistic_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_statistic_category (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, upgrade_cost INT NOT NULL, max_val INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_tendency (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, max_val INT NOT NULL, max_circles INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_various (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_weapon_category (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_weapon_special_capacity (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_wounds (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, malus INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thread (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, is_receiver_deleted TINYINT(1) NOT NULL, is_sender_deleted TINYINT(1) NOT NULL, purpose VARCHAR(255) NOT NULL, INDEX IDX_31204C83F624B39D (sender_id), INDEX IDX_31204C83CD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, login VARCHAR(30) NOT NULL, is_available TINYINT(1) NOT NULL, date_creation DATETIME NOT NULL, date_last_update DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article_article_tag ADD CONSTRAINT FK_B15FE9E7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_article_tag ADD CONSTRAINT FK_B15FE9ED015F491 FOREIGN KEY (article_tag_id) REFERENCES article_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campaign ADD CONSTRAINT FK_1F1512DD7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE campaign ADD CONSTRAINT FK_1F1512DDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE2904019 FOREIGN KEY (thread_id) REFERENCES thread (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news_news_tag ADD CONSTRAINT FK_F7007BF0B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_news_tag ADD CONSTRAINT FK_F7007BF0367BA065 FOREIGN KEY (news_tag_id) REFERENCES news_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prophecy_armor ADD CONSTRAINT FK_3215A3CB12469DE2 FOREIGN KEY (category_id) REFERENCES prophecy_armor_category (id)');
        $this->addSql('ALTER TABLE prophecy_combat_weapon ADD CONSTRAINT FK_B79991912469DE2 FOREIGN KEY (category_id) REFERENCES prophecy_weapon_category (id)');
        $this->addSql('ALTER TABLE prophecy_hast_weapon ADD CONSTRAINT FK_39DED22812469DE2 FOREIGN KEY (category_id) REFERENCES prophecy_weapon_category (id)');
        $this->addSql('ALTER TABLE prophecy_range_weapon ADD CONSTRAINT FK_59B37C6312469DE2 FOREIGN KEY (category_id) REFERENCES prophecy_weapon_category (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD5CC80CD12 FOREIGN KEY (age_id) REFERENCES prophecy_age (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD56BB0AE84 FOREIGN KEY (items_id) REFERENCES prophecy_various (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD5F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD5F92F3E70 FOREIGN KEY (country_id) REFERENCES prophecy_country (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD547D39BD9 FOREIGN KEY (omen_id) REFERENCES prophecy_omen (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD57E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD51A429CB3 FOREIGN KEY (purse_id) REFERENCES prophecy_sheet_purse (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD5C835E77F FOREIGN KEY (magic_domain_id) REFERENCES prophecy_sheet_magic_domain (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD590D3DF94 FOREIGN KEY (disciplines_id) REFERENCES prophecy_sheet_discipline (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD5E80EC759 FOREIGN KEY (tendencies_id) REFERENCES prophecy_sheet_tendency (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD57B965BDE FOREIGN KEY (wounds_id) REFERENCES prophecy_sheet_wounds (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD59A2595B2 FOREIGN KEY (statistics_id) REFERENCES prophecy_sheet_statistic (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD5BAAF4009 FOREIGN KEY (attributes_id) REFERENCES prophecy_sheet_attributes (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD55D20926C FOREIGN KEY (caracteristics_id) REFERENCES prophecy_sheet_caracteristics (id)');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD57FF61858 FOREIGN KEY (skills_id) REFERENCES prophecy_sheet_skills (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_attributes ADD CONSTRAINT FK_175903848B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_attributes ADD CONSTRAINT FK_17590384B6E62EFA FOREIGN KEY (attribute_id) REFERENCES prophecy_attribute (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_caracteristics ADD CONSTRAINT FK_BD2A45638B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_caracteristics ADD CONSTRAINT FK_BD2A456381194CF4 FOREIGN KEY (caracteristic_id) REFERENCES prophecy_caracteristic (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_discipline ADD CONSTRAINT FK_537C73CB8B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_discipline ADD CONSTRAINT FK_537C73CBA5522701 FOREIGN KEY (discipline_id) REFERENCES prophecy_discipline (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_magic_domain ADD CONSTRAINT FK_FC75A6AB8B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_magic_domain ADD CONSTRAINT FK_FC75A6ABC835E77F FOREIGN KEY (magic_domain_id) REFERENCES prophecy_magic_domain (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_purse ADD CONSTRAINT FK_4C8D29F8B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_purse ADD CONSTRAINT FK_4C8D29F38248176 FOREIGN KEY (currency_id) REFERENCES prophecy_currency (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_skills ADD CONSTRAINT FK_635E5DDB8B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_skills ADD CONSTRAINT FK_635E5DDB5585C142 FOREIGN KEY (skill_id) REFERENCES prophecy_skill (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_statistic ADD CONSTRAINT FK_7F361EAC53B6268F FOREIGN KEY (statistic_id) REFERENCES prophecy_statistic (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_statistic ADD CONSTRAINT FK_7F361EAC8B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_tendency ADD CONSTRAINT FK_4FBFC7548B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_tendency ADD CONSTRAINT FK_4FBFC7546867581F FOREIGN KEY (tendency_id) REFERENCES prophecy_tendency (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_wounds ADD CONSTRAINT FK_DCDD0F4C7B965BDE FOREIGN KEY (wounds_id) REFERENCES prophecy_wounds (id)');
        $this->addSql('ALTER TABLE prophecy_sheet_wounds ADD CONSTRAINT FK_DCDD0F4C8B1206A5 FOREIGN KEY (sheet_id) REFERENCES prophecy_sheet (id)');
        $this->addSql('ALTER TABLE prophecy_skill ADD CONSTRAINT FK_D30FB940B6E62EFA FOREIGN KEY (attribute_id) REFERENCES prophecy_attribute (id)');
        $this->addSql('ALTER TABLE prophecy_spell ADD CONSTRAINT FK_5D0D90BAC835E77F FOREIGN KEY (magic_domain_id) REFERENCES prophecy_magic_domain (id)');
        $this->addSql('ALTER TABLE prophecy_spell ADD CONSTRAINT FK_5D0D90BAA5522701 FOREIGN KEY (discipline_id) REFERENCES prophecy_discipline (id)');
        $this->addSql('ALTER TABLE prophecy_statistic ADD CONSTRAINT FK_137A908B2317909B FOREIGN KEY (statistic_category_id) REFERENCES prophecy_statistic_category (id)');
        $this->addSql('ALTER TABLE thread ADD CONSTRAINT FK_31204C83F624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE thread ADD CONSTRAINT FK_31204C83CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_article_tag DROP FOREIGN KEY FK_B15FE9E7294869C');
        $this->addSql('ALTER TABLE article_article_tag DROP FOREIGN KEY FK_B15FE9ED015F491');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD5F639F774');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C12469DE2');
        $this->addSql('ALTER TABLE campaign DROP FOREIGN KEY FK_1F1512DDE48FD905');
        $this->addSql('ALTER TABLE news_news_tag DROP FOREIGN KEY FK_F7007BF0B5A459A0');
        $this->addSql('ALTER TABLE news_news_tag DROP FOREIGN KEY FK_F7007BF0367BA065');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD5CC80CD12');
        $this->addSql('ALTER TABLE prophecy_armor DROP FOREIGN KEY FK_3215A3CB12469DE2');
        $this->addSql('ALTER TABLE prophecy_sheet_attributes DROP FOREIGN KEY FK_17590384B6E62EFA');
        $this->addSql('ALTER TABLE prophecy_skill DROP FOREIGN KEY FK_D30FB940B6E62EFA');
        $this->addSql('ALTER TABLE prophecy_sheet_caracteristics DROP FOREIGN KEY FK_BD2A456381194CF4');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD5F92F3E70');
        $this->addSql('ALTER TABLE prophecy_sheet_purse DROP FOREIGN KEY FK_4C8D29F38248176');
        $this->addSql('ALTER TABLE prophecy_sheet_discipline DROP FOREIGN KEY FK_537C73CBA5522701');
        $this->addSql('ALTER TABLE prophecy_spell DROP FOREIGN KEY FK_5D0D90BAA5522701');
        $this->addSql('ALTER TABLE prophecy_sheet_magic_domain DROP FOREIGN KEY FK_FC75A6ABC835E77F');
        $this->addSql('ALTER TABLE prophecy_spell DROP FOREIGN KEY FK_5D0D90BAC835E77F');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD547D39BD9');
        $this->addSql('ALTER TABLE prophecy_sheet_attributes DROP FOREIGN KEY FK_175903848B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_caracteristics DROP FOREIGN KEY FK_BD2A45638B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_discipline DROP FOREIGN KEY FK_537C73CB8B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_magic_domain DROP FOREIGN KEY FK_FC75A6AB8B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_purse DROP FOREIGN KEY FK_4C8D29F8B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_skills DROP FOREIGN KEY FK_635E5DDB8B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_statistic DROP FOREIGN KEY FK_7F361EAC8B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_tendency DROP FOREIGN KEY FK_4FBFC7548B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet_wounds DROP FOREIGN KEY FK_DCDD0F4C8B1206A5');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD5BAAF4009');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD55D20926C');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD590D3DF94');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD5C835E77F');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD51A429CB3');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD57FF61858');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD59A2595B2');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD5E80EC759');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD57B965BDE');
        $this->addSql('ALTER TABLE prophecy_sheet_skills DROP FOREIGN KEY FK_635E5DDB5585C142');
        $this->addSql('ALTER TABLE prophecy_sheet_statistic DROP FOREIGN KEY FK_7F361EAC53B6268F');
        $this->addSql('ALTER TABLE prophecy_statistic DROP FOREIGN KEY FK_137A908B2317909B');
        $this->addSql('ALTER TABLE prophecy_sheet_tendency DROP FOREIGN KEY FK_4FBFC7546867581F');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD56BB0AE84');
        $this->addSql('ALTER TABLE prophecy_combat_weapon DROP FOREIGN KEY FK_B79991912469DE2');
        $this->addSql('ALTER TABLE prophecy_hast_weapon DROP FOREIGN KEY FK_39DED22812469DE2');
        $this->addSql('ALTER TABLE prophecy_range_weapon DROP FOREIGN KEY FK_59B37C6312469DE2');
        $this->addSql('ALTER TABLE prophecy_sheet_wounds DROP FOREIGN KEY FK_DCDD0F4C7B965BDE');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE2904019');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66F675F31B');
        $this->addSql('ALTER TABLE campaign DROP FOREIGN KEY FK_1F1512DD7E3C61F9');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FCD53EDB6');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950F675F31B');
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD57E3C61F9');
        $this->addSql('ALTER TABLE thread DROP FOREIGN KEY FK_31204C83F624B39D');
        $this->addSql('ALTER TABLE thread DROP FOREIGN KEY FK_31204C83CD53EDB6');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_article_tag');
        $this->addSql('DROP TABLE article_tag');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE caste');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE dice');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_news_tag');
        $this->addSql('DROP TABLE news_tag');
        $this->addSql('DROP TABLE prophecy_advantage');
        $this->addSql('DROP TABLE prophecy_age');
        $this->addSql('DROP TABLE prophecy_armor');
        $this->addSql('DROP TABLE prophecy_armor_category');
        $this->addSql('DROP TABLE prophecy_attribute');
        $this->addSql('DROP TABLE prophecy_caracteristic');
        $this->addSql('DROP TABLE prophecy_combat_weapon');
        $this->addSql('DROP TABLE prophecy_country');
        $this->addSql('DROP TABLE prophecy_currency');
        $this->addSql('DROP TABLE prophecy_disadvantage');
        $this->addSql('DROP TABLE prophecy_discipline');
        $this->addSql('DROP TABLE prophecy_hast_weapon');
        $this->addSql('DROP TABLE prophecy_magic_domain');
        $this->addSql('DROP TABLE prophecy_magic_mana');
        $this->addSql('DROP TABLE prophecy_omen');
        $this->addSql('DROP TABLE prophecy_range_weapon');
        $this->addSql('DROP TABLE prophecy_sheet');
        $this->addSql('DROP TABLE prophecy_sheet_advantages');
        $this->addSql('DROP TABLE prophecy_sheet_attributes');
        $this->addSql('DROP TABLE prophecy_sheet_caracteristics');
        $this->addSql('DROP TABLE prophecy_sheet_disadvantages');
        $this->addSql('DROP TABLE prophecy_sheet_discipline');
        $this->addSql('DROP TABLE prophecy_sheet_magic_domain');
        $this->addSql('DROP TABLE prophecy_sheet_purse');
        $this->addSql('DROP TABLE prophecy_sheet_skills');
        $this->addSql('DROP TABLE prophecy_sheet_statistic');
        $this->addSql('DROP TABLE prophecy_sheet_tendency');
        $this->addSql('DROP TABLE prophecy_sheet_wounds');
        $this->addSql('DROP TABLE prophecy_skill');
        $this->addSql('DROP TABLE prophecy_spell');
        $this->addSql('DROP TABLE prophecy_statistic');
        $this->addSql('DROP TABLE prophecy_statistic_category');
        $this->addSql('DROP TABLE prophecy_tendency');
        $this->addSql('DROP TABLE prophecy_various');
        $this->addSql('DROP TABLE prophecy_weapon_category');
        $this->addSql('DROP TABLE prophecy_weapon_special_capacity');
        $this->addSql('DROP TABLE prophecy_wounds');
        $this->addSql('DROP TABLE thread');
        $this->addSql('DROP TABLE user');
    }
}
