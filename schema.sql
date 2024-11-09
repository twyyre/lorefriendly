CREATE TABLE quests (
    quest_id INT PRIMARY KEY AUTO_INCREMENT,
    quest_name VARCHAR(100) NOT NULL,
    description TEXT,
    quest_trigger VARCHAR(100), -- Name or ID of the NPC or entity giving the quest
    quest_type INT(1) DEFAUL 0, --0-sidequest 1-main quest 2-task
    repeatable BOOLEAN DEFAULT FALSE,
    conditions INT DEFAULT 1, 
    rewards INT DEFAULT 0, -- for completing the quest
    status INT(1) DEFAULT 0,
    time_limit INT, -- Time limit to complete the quest (in minutes), if any
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

    -- Define foreign keys if necessary (e.g., reward_item_id might reference an items table)
    -- CONSTRAINT fk_reward_item FOREIGN KEY (reward_item_id) REFERENCES items(item_id)
);
CREATE TABLE triggers (
    trigger_id INT PRIMARY KEY AUTO_INCREMENT,
    trigger_name VARCHAR(100) NOT NULL,
    description TEXT,
    trigger_type INT(1) DEFAULT 0,
    trigger_target INT(1) DEFAULT 0,
    target_Type INT(1) DEFAULT 0,
    activator INT(1) DEFAULT 0,
    activator_type INT(1) DEFAULT 0,
    repeatable BOOLEAN DEFAULT FALSE,
    conditions INT DEFAULT 1, 
    status INT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
);
CREATE TABLE items (
    item_id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(100) NOT NULL,
    item_type ENUM('weapon', 'armor', 'potion', 'material', 'quest', 'misc') NOT NULL,
    description TEXT,
    rarity ENUM('common', 'uncommon', 'rare', 'epic', 'legendary') DEFAULT 'common',
    value INT DEFAULT 0, -- The base value or price of the item in gold
    weight DECIMAL(5, 2) DEFAULT 0.00, -- The weight of the item, useful for inventory management
    attack_power INT DEFAULT 0, -- Attack value for weapons
    defense_power INT DEFAULT 0, -- Defense value for armor
    health_restore INT DEFAULT 0, -- Amount of health restored (useful for potions)
    mana_restore INT DEFAULT 0, -- Amount of mana restored (for magical items)
    is_consumable BOOLEAN DEFAULT FALSE, -- Whether the item is consumed on use
    is_tradeable BOOLEAN DEFAULT TRUE, -- Whether the item can be traded
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE characters (
    character_id INT PRIMARY KEY AUTO_INCREMENT,
    character_name VARCHAR(100) NOT NULL,
    race ENUM(0, 1, 2, 3, 4) NOT NULL,
    class ENUM() NOT NULL,
    level INT DEFAULT 1,
    experience INT DEFAULT 0,
    health INT DEFAULT 100,
    max_health INT DEFAULT 100,
    mana INT DEFAULT 50,
    max_mana INT DEFAULT 50,
    strength INT DEFAULT 10,
    dexterity INT DEFAULT 10,
    intelligence INT DEFAULT 10,
    defense INT DEFAULT 10,
    location VARCHAR(100), -- Current location of the character in the game world
    is_npc BOOLEAN DEFAULT FALSE, -- Whether the character is a non-player character
    gold INT DEFAULT 0, -- Amount of gold the character possesses
    inventory TEXT, -- JSON or serialized data to store inventory items, or use a separate inventory table
    equipped_weapon_id INT, -- Foreign key reference to an item (weapon)
    equipped_armor_id INT, -- Foreign key reference to an item (armor)
    faction VARCHAR(100), -- Optional affiliation or faction of the character
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Define foreign keys if necessary (e.g., for equipped_weapon_id and equipped_armor_id)
    CONSTRAINT fk_equipped_weapon FOREIGN KEY (equipped_weapon_id) REFERENCES items(item_id),
    CONSTRAINT fk_equipped_armor FOREIGN KEY (equipped_armor_id) REFERENCES items(item_id)
);
CREATE TABLE dialogue (
    dialogue_id INT PRIMARY KEY AUTO_INCREMENT,
    character_id INT NOT NULL, -- Foreign key linking to the characters table
    quest_id INT, -- Optional foreign key linking to a specific quest if the dialogue is quest-related
    dialogue_text TEXT NOT NULL, -- The actual dialogue line
    response_options JSON, -- Possible player responses, stored in JSON format
    next_dialogue_id INT, -- Points to the next dialogue in the sequence
    emotion ENUM('neutral', 'happy', 'angry', 'sad', 'fearful', 'surprised', 'disgusted') DEFAULT 'neutral',
    condition TEXT, -- Optional conditions for this dialogue to appear (e.g., based on player's level, quest stage)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Foreign key constraints
    CONSTRAINT fk_character FOREIGN KEY (character_id) REFERENCES characters(character_id),
    CONSTRAINT fk_quest FOREIGN KEY (quest_id) REFERENCES quests(quest_id),
    CONSTRAINT fk_next_dialogue FOREIGN KEY (next_dialogue_id) REFERENCES dialogue(dialogue_id)
);
CREATE TABLE memories (
    memory_id INT PRIMARY KEY AUTO_INCREMENT,
    character_id INT NOT NULL, -- Foreign key linking to the character who has the memory
    event_type ENUM('attack', 'loss', 'quest', 'betrayal', 'friendship', 'help', 'other') NOT NULL, -- Type of event
    description TEXT, -- Description of the memory
    impact ENUM('positive', 'neutral', 'negative') DEFAULT 'neutral', -- Impact on the character's disposition
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- When the memory was created
    duration INT DEFAULT NULL, -- Duration in days the memory will last (NULL for permanent memories)
    related_character_id INT, -- Reference to another character involved in the memory, if any
    quest_id INT, -- Reference to a quest related to this memory, if applicable
    is_active BOOLEAN DEFAULT TRUE, -- Whether the memory is active or has faded over time
    emotion ENUM('anger', 'sadness', 'fear', 'joy', 'trust', 'surprise', 'anticipation', 'disgust') DEFAULT 'neutral', -- Dominant emotion associated with the memory
    resolution_status ENUM('unresolved', 'resolved') DEFAULT 'unresolved', -- Whether the memory has been resolved or addressed
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Foreign key constraints
    CONSTRAINT fk_character_memory FOREIGN KEY (character_id) REFERENCES characters(character_id),
    CONSTRAINT fk_related_character FOREIGN KEY (related_character_id) REFERENCES characters(character_id),
    CONSTRAINT fk_quest_memory FOREIGN KEY (quest_id) REFERENCES quests(quest_id)
);
