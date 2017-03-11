#include <bits/stdc++.h>

using namespace std;

typedef long long L;

const L INF = 1000000000000000;

int main()
{ 
  vector <L> p;
  L tot = 0, now = 1;
  
  for (int i = 0; ; ++i) {
    tot += now * 3;
    p.push_back(tot);
    tot += now * 4;
    p.push_back(tot);
    now *= 8;
    if (tot > INF) break;
  }
  
  int t;
  scanf("%d", &t);
  assert(1 <= t && t <= 100000);
  
  int cnt = 0;
  
  L n;
  while (scanf("%lld", &n) != -1) {
    cnt++;
    assert(1 <= n && n <= INF);
    int pos = lower_bound(p.begin(), p.end(), n) - p.begin();
    cout << (pos % 2 == 0 ? "Alice" : "Bob") << endl;
  }
  
  assert(cnt == t);
  return(0);
}
