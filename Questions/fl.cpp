#include <bits/stdc++.h>

using namespace std;

int main()
{
  for (int i = 1; i <= 23; ++i) {
    char ss[10];
    sprintf(ss, "%d.php", i);
    ifstream fin(ss, ifstream::in); 
    vector <vector <string>> vv;
    string now;
    bool backE = 0, frontE = 0;
    while (getline(fin, now)) {
      int sz = now.size();
      vector <string> words;
      istringstream iss(now);
      string cur;
      while (iss >> cur) {
        if (cur == "<label>") {
          if (!backE) words.erase(words.end() - 1), backE = 1;
        }
        words.push_back(cur);
        if (cur == "</label>" && !frontE) frontE = 1, iss >> cur;
      }
      vv.push_back(words);
    }
    fin.close();
    ofstream fout(ss, ofstream::out);
    for (auto it : vv) {
       for (auto s : it) {
         fout << s << ' ';
       }
       fout << '\n';
    }
    fout.close();
  }
  return(0);
}

