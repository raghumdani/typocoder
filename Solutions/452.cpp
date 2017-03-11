#include<bits/stdc++.h>
using namespace std;

int a[1005];

int main()
{
    int t;
    string s;
    scanf("%d", &t);
    while(t--)
    {
        int ans = 0;
        memset(a, 0, sizeof(a));
        cin>>s;
        int n = (int)s.length();
        sort(s.begin(), s.end());
        do
        {
            int temp = 0;
            for(int i = 0; i < n; i++)
            {
                temp += ((i + 1) * (s[i] - '0'));
            }
            a[temp]++;
        }while(next_permutation(s.begin(), s.end()));
        for(int i = 0; i < 1005; i++)
            ans = max(ans, a[i]);
        printf("%d\n", ans);
    }
    return 0;
}
