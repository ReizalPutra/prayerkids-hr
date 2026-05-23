<#
PowerShell script: untrack and remove committed SQLite test files
Run from repository root in PowerShell (Windows).
#>
Write-Host "Finding committed sqlite files in backend/database..."
$files = Get-ChildItem -Path "backend/database" -Filter "*.sqlite*" -File -Recurse -ErrorAction SilentlyContinue
if ($files.Count -eq 0) {
    Write-Host "No sqlite files found to untrack."
    exit 0
}
foreach ($f in $files) {
    Write-Host "Untracking: $($f.FullName)"
    git rm --cached -- "$($f.FullName)" | Out-Null
}
git commit -m "chore: remove committed sqlite database files" -q
Write-Host "Committed removal of sqlite files. You may need to push the commit." 
