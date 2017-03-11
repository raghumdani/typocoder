#include<bits/stdc++.h>
using namespace std;

int t[100005], v[100005];
long long m;
int n;

long long getMangoes(long long x)
{
    long long r = 0;
    for(int i = 0; i < n; i++)
        r += ((x / t[i]) * v[i]);
    return r;
}

int main()
{
    int q;
    scanf("%d", &n);
    for(int i = 0; i < n; i++)
        scanf("%d", v + i);
    for(int i = 0; i < n; i++)
        scanf("%d", t + i);
    scanf("%d", &q);
    while(q--)
    {
        scanf("%lld", &m);
        long long l = 1, r = 1e13 + 5;
        while(l < r)
        {
            long long mid = l + r >> 1;
            if(getMangoes(mid) < m)
                l = mid + 1;
            else
                r = mid;
        }
        printf("%lld\n", l);
    }
    return 0;
}
