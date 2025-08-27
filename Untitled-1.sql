sqlite3 karyawan.db "
CREATE TABLE karyawan (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nama VARCHAR(30) NOT NULL,
    jabatan VARCHAR(30) NOT NULL,
    tanggal_masuk DATETIME NULL,
    status BOOL FALSE
);
INSERT INTO karyawan (nama, jabatan, tanggal_masuk, status) VALUES
('Bagas', 'Admin', datetime('now'), TRUE),
('Arif', 'Staff', datetime('now'), TRUE),
('Surya', 'Manager', datetime('now'), TRUE);
"
