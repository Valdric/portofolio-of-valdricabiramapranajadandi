import fs from 'fs';
import path from 'path';

const __dirname = path.resolve();

function copyFile(src, dest) {
  fs.copyFileSync(src, dest);
  console.log(`Copied ${src} -> ${dest}`);
}

function copyFolderSync(from, to) {
  if (!fs.existsSync(to)) {
    fs.mkdirSync(to, { recursive: true });
  }
  fs.readdirSync(from).forEach(element => {
    const fromPath = path.join(from, element);
    const toPath = path.join(to, element);
    if (fs.lstatSync(fromPath).isFile()) {
      fs.copyFileSync(fromPath, toPath);
    } else {
      copyFolderSync(fromPath, toPath);
    }
  });
}

function build() {
  const distDir = path.join(__dirname, 'dist');
  
  console.log('Starting static build script...');
  
  // Clean dist directory if exists
  if (fs.existsSync(distDir)) {
    fs.rmSync(distDir, { recursive: true, force: true });
    console.log('Cleaned existing dist directory.');
  }
  fs.mkdirSync(distDir);
  
  // Copy root static files
  const filesToCopy = ['index.html', 'cv.html', 'style.css', 'script.js'];
  filesToCopy.forEach(file => {
    const src = path.join(__dirname, file);
    if (fs.existsSync(src)) {
      copyFile(src, path.join(distDir, file));
    } else {
      console.warn(`Warning: file ${file} not found in root.`);
    }
  });
  
  // Copy public/images folder
  const srcImages = path.join(__dirname, 'public', 'images');
  const destImages = path.join(distDir, 'public', 'images');
  if (fs.existsSync(srcImages)) {
    copyFolderSync(srcImages, destImages);
    console.log('Copied public/images -> dist/public/images');
  } else {
    console.warn('Warning: public/images folder not found.');
  }
  
  console.log('Static build completed successfully in "dist" directory.');
}

build();
