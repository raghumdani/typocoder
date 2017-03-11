#include "bits/stdc++.h"
using namespace std;

int n;
long long int a[100005];
long long int megh[100005];
int main()
{
    scanf("%d", &n);
    for(int i = 1 ; i <= n ; i++)
    {
        scanf("%lld", &a[i]);
        megh[i] = a[i];
    }
    long long int meghans1 = 0;
    long long int meghans2 = 0;
    for(int i = 1 ; i <= n ; i++)
    {
        a[i] += a[i-1];
        meghans1 += a[i];
    }
    sort(megh + 1 , megh + n + 1);
    for(int i = 1 ; i <= n ; i++)
    {
        megh[i] += megh[i-1];
        meghans2 += megh[i];
    }
    printf("%lld\n", abs(meghans1 - meghans2));
    return 0;
}
