import os

filepath = '/Users/mac/Project Website/Kerja/Super-Admin-Digital-Networks-Business/resources/views/index.blade.php'

with open(filepath, 'r', encoding='utf-8') as f:
    lines = f.readlines()

# Let's verify line 416 and 1357 (0-based: 415 and 1356)
start_idx = 415  # line 416
end_idx = 1356    # line 1357

print("Start line (416):", repr(lines[start_idx]))
print("End line (1357):", repr(lines[end_idx]))

# Let's perform the cleanup
new_lines = lines[:start_idx] + lines[end_idx+1:]

with open(filepath, 'w', encoding='utf-8') as f:
    f.writelines(new_lines)

print("Cleanup successful. Removed lines 416 to 1357.")
