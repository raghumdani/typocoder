#include <bits/stdc++.h>

using namespace std;

const int N = 212345;
vector <pair <int,int> > pos;
int ans[N];

int main()
{
  int n;
  scanf("%d", &n);
  for(int i = 0; i < n; ++i) {
    int a, b;
    scanf("%d %d", &a, &b);
    pos.push_back({a, b});
  }
  sort(pos.begin(), pos.end());
  
  int po = 0;
  for(int i = 0; i < n; ++i) {
    int id = lower_bound(pos.begin(), pos.end(), make_pair(pos[i].first - pos[i].second, -1)) - pos.begin();
    ans[i] = 1;
    if(id - 1 >= 0)
      ans[i] = max(ans[i], 1 + ans[id - 1]);
    if(ans[po] <= ans[i]) po = i;
  }
  printf("%d\n", n - ans[po]);
  return(0);
}
