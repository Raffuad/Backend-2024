// Import data students dari folder data/students.js
const students = require('./data/students');

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    res.json(students); // Mengirimkan data students sebagai response
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    const newStudent = req.body; // Mengambil data dari request body
    students.push(newStudent); // Menambahkan student ke array
    res.status(201).json(newStudent); // Mengirim response dengan status 201
  }

  update(req, res) {
    // TODO 6: Update data students
    const { id } = req.params; // Mengambil id dari parameter
    const index = students.findIndex(student => student.id === id);
    
    if (index !== -1) {
      students[index] = { ...students[index], ...req.body }; // Memperbarui data student
      res.json(students[index]); // Mengirim response dengan data yang diperbarui
    } else {
      res.status(404).json({ message: 'Student not found' }); // Mengirim response jika student tidak ditemukan
    }
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    const { id } = req.params; // Mengambil id dari parameter
    const index = students.findIndex(student => student.id === id);
    
    if (index !== -1) {
      students.splice(index, 1); // Menghapus student dari array
      res.status(204).send(); // Mengirim response dengan status 204
    } else {
      res.status(404).json({ message: 'Student not found' }); // Mengirim response jika student tidak ditemukan
    }
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;