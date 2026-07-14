path = r"C:\Users\viyendra\ASET NEGARA\Website Portofolio\website-portofolio\resources\views\welcome.blade.php"
with open(path, "r", encoding="utf-8") as f:
    content = f.read()

import re
matches = re.finditer(r"document\.getElementById\(.*?\)", content)
for m in matches:
    # print line
    line_start = content.rfind('\n', 0, m.start()) + 1
    line_end = content.find('\n', m.start())
    print(content[line_start:line_end].strip())
