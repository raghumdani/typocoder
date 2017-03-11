#include <stdio.h> 

int main()
{ 
    int n,i;
    scanf("%d",&n);
    int a[n],p[n];
    for(i=0;i<n;i++)
    {
        scanf("%d",&a[i]);
        p[i]=1;
    }
    for(i=0;i<n;i++)
    {
        while(a[i]>0)
        {
        p[i]=p[i]*(a[n]%10);         
        a[i]=a[i]/10;
        }
        printf("%d",p[i]);
    }
    return(0);
}