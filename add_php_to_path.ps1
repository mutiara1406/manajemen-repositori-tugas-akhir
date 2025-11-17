$phpFolder = 'C:\laragon\bin\php\php-8.3.26-Win32-vs16-x64'
$currentPath = [Environment]::GetEnvironmentVariable('Path', 'User')
$newPath = $currentPath + ';' + $phpFolder
[Environment]::SetEnvironmentVariable('Path', $newPath, 'User')
Write-Host "PHP folder ditambahkan ke User PATH"
Write-Host "Folder: $phpFolder"
Write-Host "Silahkan tutup PowerShell dan buka yang baru untuk PATH berlaku"
