#include<stdio.h>

int main() {
    int i,n,c=0,j;
    scanf("%d",&n);
    int a[n];
    for(i=0;i<n;i++)
        scanf("%d",&a[i]);
    for(i=0;i<n;i++)
    {
        j=i;
        do
        {
            c++;
            j=(j+1)%n;
            if(j==i)
                break;
        }while(a[j]<=a[i]);
    }
    printf("%d\n",c);
	return(0);
}
