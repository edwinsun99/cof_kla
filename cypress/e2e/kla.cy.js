describe('Skenario Demo KLA Service Center', () => {
  
 it('Login Semi-Otomatis (Captcha Isi Manual)', () => {
  cy.visit('http://127.0.0.1:8000/login');

  cy.get('input[name="username"]').type('Maulida-CM'); 
  cy.get('input[name="password"]').type('m@ulida');

  // ROBOT BERHENTI 7 DETIK
  // Dalam waktu ini, KAMU ngetik captcha-nya di browser!
  cy.wait(7000); 

  cy.get('button[type="submit"]').click();

  cy.wait(3000);
  cy.url().should('include', '/dashboard');
});

it('Simulasi Edit Profile: Ganti PP dan Password', () => {
    // 1. Masuk ke halaman Edit Profile
    // (Ganti URL ini sesuai dengan link Edit Profile di web KLA kamu)
    cy.visit('http://127.0.0.1:8000/cm/profile'); 

    // 2. GANTI FOTO PROFIL
    // Cypress butuh file contoh di folder 'cypress/fixtures'
    // Pastikan kamu sudah taruh file gambar bernama 'profil-baru.jpg' di sana
    cy.get('input[type="file"]').selectFile('cypress/fixtures/rubyonrails.png');

    // 3. GANTI PASSWORD
    cy.get('input[placeholder="Current Password"]').type('m@ulida'); // Password lama
    cy.get('input[placeholder="New Password"]').type('maulid@'); // Password baru
    cy.get('input[placeholder="Confirm New Password"]').type('maulid@');

    // 4. KLIK UPDATE PASSWORD
    cy.get('button').contains('Update Password').click();

    // 5. KLIK SAVE PROFILE (Untuk simpan foto profil)
    cy.get('button').contains('Save Profile Details').click();

    // 6. VERIFIKASI
    cy.contains('Profile updated successfully').should('be.visible');
  });

});