<?php
include '../config/layout.php';
include '../config/Database.php';
include '../object/Petugas.php';

$database = new Database();
$db = $database->getConnection();

$petugas = new Petugas($db);

//get ID
$petugas->ID = $_GET["ID"];
$petugas->readOne();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Data Petugas</h2>
      <form action="proses-ubah.php" method="POST">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                  <label for="namapetugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Petugas</label>
                  <input type="text" value="<?= $petugas->NamaPetugas ?>" name="namapetugas" id="namapetugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nama Petugas" required="">
              </div>
              <div class="w-full">
                  <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                  <input type="text" value="<?= $petugas->Alamat ?>" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Alamat" required="">
              </div>
              <div class="w-full">
                  <label for="notelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                  <input type="text" value="<?= $petugas->NoTelp ?>" name="notelp" id="notelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nomor Telepon" required="">
              </div>
              <div class="w-full">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                  <input type="text" value="<?= $petugas->Email ?>" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Email" required="">
              </div>
              <div class="w-full">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                  <input type="password" value="<?= $petugas->Password ?>" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Password" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                  <select id="role" name="role" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="admin">Admin</option>
                    <option value="staf">Staf</option>
                  </select>
              </div>
              <div class="sm:col-span-2">
                  <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                  <input type="hidden" value="<?= $petugas->ID ?>" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nama Lengkap" required="">
              </div>
          </div>
          <button> 
          <div class="sm:col-span-2">
                              <button type="submit" class="text-white bg-blue-700
          hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
          font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
          dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                   <button type="button" onclick="history.back()"
          class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4
          focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200
          text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-
          gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white
          dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>

          </div>
          </button>
      </form>
    </div>
</div>

</body>
</html>