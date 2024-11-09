const express = require('express');
const { exit } = require('process');
const router = express.Router()
const dbconn = require("../dbcon.js");
const jwt = require('jsonwebtoken');
const { error } = require('console');

/**
 * @swagger
 * /users/all:
 *   get:
 *     tags:
 *      - Users
 *     summary: Returns a list of all users
 *     responses:
 *       200:
 *         description: A successful response
*/
router.get(`/`, (req, res) => {
    var params = req.query.p;
    res.status(200).send('quests index:' + params);
});
router.get(`/get/id`, (req, res) => {
    var params = req.query.p;
    res.status(200).send('get quest by id');
});
router.get(`/get/name`, (req, res) => {
    var params = req.query.p;
    res.status(200).send('get quest by name');
});
router.post(`/add`, (req, res) => { //adds the user
    var params = req.query.p;
    res.status(200).send('add a new quest');
});
router.post(`/update`, (req, res) => { //adds the user
    var params = req.query.p;
    res.status(200).send('update an existing quest');
});

module.exports = router; //or use export default router;