// enums
const questStatus = Object.freeze({
    NOT_STARTED: 0,
    IN_PROGRESS: 1,
    COMPLETED: 2,
    FAILED: 3
});
const questType = Object.freeze({
    SIDEQUEST: 0,
    MAINQUEST: 1,
    TASK: 2
});
const raceEnums = Object.freeze({
    HUMAN: 0,
    ELF: 1,
    DWARF: 2,
    ORC: 3,
    OTHER: 4
});
const classEnums = Object.freeze({
    KNIGHT: 0,
    LANCER: 1,
    WARRIOR: 2,
    ARCHER: 3,
    MAGE: 4,
    CLERIC: 5,
    BERSERKER: 6,
});
const factionEnums = Object.freeze({
    FACTION0: 0,
    FACTION1: 1,
    FACTION2: 2,
    FACTION3: 3,
    FACTION4: 4,
    FACTION5: 5,
    FACTION6: 6
});
const triggerTypeEnums = Object.freeze({
    DIALOGUE: 0,
    AREA: 1,
    ATTACK: 2,
    DEATH: 3,
    TIME: 4
});
module.exports = questEnums;
module.exports = raceEnums;
module.exports = factionEnums;
module.exports = questType;