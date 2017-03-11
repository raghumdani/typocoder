#include<bits/stdc++.h>
using namespace std;

int dp[2002][2];
vector<int> v;
int a[2002];

int main()
{
    int t, n;
    scanf("%d", &t);
    while(t--)
    {
        v.clear();
        memset(dp, 0, sizeof(dp));
        scanf("%d", &n);
        for(int i = 1; i <= n; i++)
            scanf("%d", a + i);
        for(int i = 1; i <= n; i++)
            dp[i][0] = dp[i][1] = 1;
        for(int i = 1; i <= n; i++)
            for(int j = 1; j < i; j++)
            {
                if(a[j] > a[i])
                    dp[i][0] = max(dp[i][0], 1 + dp[j][1]);
                else
                    dp[i][1] = max(dp[i][1], 1 + dp[j][0]);
            }
        int r = 0;
        for(int i = 1; i <= n; i++)
            for(int k = 0; k < 2; k++)
                r = max(r, dp[i][k]);
        printf("%d\n", r);
        int l, sub = 0;
        for(int i = n; i >= 1; i--)
        {
            if(dp[i][0] == r || dp[i][1] == r)
            {
                if(dp[i][0] == r)
                    l = 0;
                else
                    l = 1;
                sub = 1;
                v.push_back(i);
                for(int j = i - 1; j >= 1; j--)
                {
                    if(dp[j][!l] == r - sub)
                    {
                        if((l && a[j] < a[i]) || (!l && a[j] > a[i]))
                        {
                            v.push_back(j);
                            i = j;
                            sub++;
                            l = !l;
                        }
                    }
                }
                break;
            }
        }
        reverse(v.begin(), v.end());
        for(int i = 0; i < (int)v.size(); i++)
            printf("%d ", a[v[i]]);
        printf("\n");
    }
    return 0;
}
