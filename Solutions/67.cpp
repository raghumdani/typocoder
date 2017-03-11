#include <bits/stdc++.h>

using namespace std;

const int N = 100005;

map <int, int> mp;
vector <int> a[N], rs;

int main()
{
  int t;
  scanf("%d", &t);
  
  while(t--) {
    int n;
    scanf("%d", &n);
    mp.clear(); rs.clear();
    
    for(int i = 0; i < n; ++i) {
      int k, foo;
      scanf("%d", &k);
      for(int j = 0; j < k; ++j) {
        scanf("%d", &foo);
        a[i].push_back(foo);
        rs.push_back(foo);
      }
    }
    
    sort(rs.begin(), rs.end());
    for(int i = 0; i < (int)rs.size(); ++i) {
      mp[rs[i]] = i + 1;
    }
    
    int br = 0, vec = 0;
    for(int i = 0; i < n; ++i) {
      vec++;
      for(int j = 1; j < (int)a[i].size(); ++j) {
        if(mp[a[i][j]] != mp[a[i][j - 1]] + 1) {
          br++;
          vec++;
        }
      }
      a[i].clear();
    }
    printf("%d\n", br + vec - 1);
  }
  return(0);
}
