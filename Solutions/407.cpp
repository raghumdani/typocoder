#include<bits/stdc++.h>
#include<iostream>
#include<stdio.h>
using namespace std;
int main()
{
    int n,i,k,m,sum=0,sum1=0;
    scanf("%d",&n);
    int a[n];
    for(i=0;i<n;i++)
    {
        scanf("%d",&a[i]);
    }
    for(i=0;i<n;i++)
    {
        k=i;
         while(k!=0)
        {
            sum+=a[k];
            k--;
        }
    }
    sort(a,a+n);
    for(i=0;i<n;i++)
    {
        m=i;
        while(m!=0)
        {
            sum1+=a[m];
            m--;
        }
    }
    printf("%d",abs(sum-sum1));
}
