mkdir -p "C:\Users\LENOVO\OneDrive\Documents\WindowsPowerShell" 2>$null
"Set-Alias -Name php -Value 'C:\laragon\bin\php\php-8.3.26-Win32-vs16-x64\php.exe' -Force" | Out-File -FilePath "C:\Users\LENOVO\OneDrive\Documents\WindowsPowerShell\Microsoft.PowerShell_profile.ps1" -Encoding UTF8 -Force
Write-Host "Profile berhasil dibuat"
