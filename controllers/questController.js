// controllers/questController.js
const quest = require('../models/questModel.js');

// Show all quests
exports.getAllquests = async (req, res) => {
    try {
        const quests = await quest.find();
        res.render('quests/index', { quests });
    } catch (err) {
        res.status(500).send("Error retrieving quests");
    }
};

// Show a single quest
exports.getquestById = async (req, res) => {
    try {
        const quest = await quest.findById(req.params.id);
        res.render('quests/show', { quest });
    } catch (err) {
        res.status(404).send("quest not found");
    }
};

// Add a new quest
exports.createquest = async (req, res) => {
    try {
        const { title, author, publishedYear } = req.body;
        const quest = new quest({ title, author, publishedYear });
        await quest.save();
        res.redirect('/quests');
    } catch (err) {
        res.status(500).send("Error creating quest");
    }
};
