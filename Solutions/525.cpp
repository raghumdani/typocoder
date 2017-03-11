#include<bits/stdc++.h>
using namespace std;
 
int a[100005];
long long givt, optt, prev;
 
int main()
{
    int n;
    scanf("%d", &n);
    prev = 0;
    for(int i = 0; i < n; i++)
    {
        scanf("%d", a + i);
        givt += prev + a[i];
        prev = prev + a[i];
    }
    sort(a, a + n);
    prev = 0;
    for(int i = 0; i < n; i++)
    {
        optt += prev + a[i];
        prev = prev + a[i];
    }
    printf("%lld\n", givt - optt);
    return 0;
}