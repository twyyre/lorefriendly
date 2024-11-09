// models/Book.js
const mongoose = require('mongoose');

const questSchema = new mongoose.Schema({
    title: { type: String, required: true },
    author: { type: String, required: true },
    publishedYear: { type: Number, required: true },
});

module.exports = mongoose.model('Book', bookSchema);
