const express = require('express');
const app = express();
const PORT = 3000;

// Middleware untuk parsing JSON
app.use(express.json());

// Mengimpor data students
const students = require('./students');

// Menjalankan server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});

// Menampilkan semua data students
app.get('/students', (req, res) => {
    res.json(students);
});